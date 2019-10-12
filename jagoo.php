<?php
include('simple_html_dom.php');
function ktzplg_get_bing_image( $keyword, $max_keyword = '', $num = 1, $related = false, $license = '' ) {

    //Set query if any passed
    $keywords = isset( $keyword ) ? str_replace(array(' ', '-'), '+', $keyword ) : '';
    
    // Add license filter to query
    if ( $license == 'free_to_use' ) {
        $qlicense = '&qft=+filterui:license-L2_L3_L4_L5_L6_L7';
    } elseif ( $license == 'free_to_use_commercial' ) {
        $qlicense = '&qft=+filterui:license-L2_L3_L4';
    } elseif ( $license == 'free_to_modify_use' ) {
        $qlicense = '&qft=+filterui:license-L2_L3_L5_L6';
    } elseif ( $license == 'free_to_modify_use_commercial' ) {
        $qlicense = '&qft=+filterui:license-L2_L3';
    } elseif ( $license == 'public_domain' ) {
        $qlicense = '&qft=+filterui:license-L1';
    } else{
        $qlicense = '';
    }
    
    
    // Add maximal number keyword in search query
    if ( $max_keyword != '' ) {
        $max_keywords = (int)$max_keyword;
        $keywords_5_first = isset( $keyword ) ? implode( ' ', array_splice( explode( ' ', $keyword ), 0, $max_keywords ) ) : '';
        $keywords = isset( $keywords_5_first ) ? str_replace(array(' ', '-'), '+', $keywords_5_first ) : '';
    }
     
    /* 
     * @str_get_html Simple HTML DOM and get url via ktzplg_fetch_agc ( curl and fopen )
     * ktzplg_fetch_agc find in _functions.php
     */
    $fetch = ktzplg_fetch_agc( 'http://www.bing.com/images/search?q='.$keywords.$qlicense );
     
    $html = new simple_html_dom();
    
    $html->load( $fetch ); //Simple HTML now use the result craped by cURL.
     
    $result = array();
    if( $html && is_object($html) ) {
        foreach($html->find('div[class="dg_b"] div[class="dg_u"]') as $gm)
        {
            /*
             * each search results are in a list item with a class name '$gm'
             * we are seperating each of the elements within, into an array
             */
        
            # Find element a with m attribute where json code can find in div.dg_u
            $get_m_attr = $gm->find('a', 0)->m;
            
            # Fixed json code
            $get_m_attr = ktzplg_fix_json( stripslashes ( html_entity_decode( $get_m_attr ) ) );
            
            # Decode json
            $get_json_m = json_decode( $get_m_attr,true );
            
            # Get link with key surl in json code
            $item['link'] = $get_json_m['surl'];
            
            # Get imgurl with key imgurl in json code
            $item['imgsrc'] = $get_json_m['imgurl'];
            
            # Get attribute t1 in a that is title image in bing search
            $item['title'] = $gm->find('a', 0)->t1;
            $result[] =  $item;
        }
        // Clean up memory
        $html->clear();
        unset($html);
    }
            return $result;

}
function ktzplg_fetch_agc( $url, $referer = '' ) {
    if (function_exists("curl_init")) {
        return ktzplg_curl_agc( $url, $referer );
    } elseif (ini_get("allow_url_fopen")) {
        return ktzplg_fopen_agc( $url );
    }
}
function ktzplg_curl_agc( $url, $referer = '', $ua = 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Ubuntu/10.04 Chromium/7.0.514.0 Chrome/7.0.514.0 Safari/534.7' ) {
    $ch = curl_init();
    $proxy = '';
    $proxy_userpass = '';
    curl_setopt($ch, CURLOPT_URL, $url);
    #proxy
    if ( !empty($proxy) ) :
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
    endif;
    
    #proxy username:pass
    if ( !empty($proxy_userpass) ) :
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_userpass);
    endif;
    
    #referer
    if ( !empty($referer) ) {
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    } else {
        curl_setopt($ch, CURLOPT_REFERER, $url);
    }
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 45);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    if ( !empty($ua) ) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    }
    
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function ktzplg_fopen_agc( $url ) {
    $result = @file_get_contents($url, false, $context);
    return $result;
}
function ktzplg_fix_json( $j ){
    $j = trim( $j );
    $j = ltrim( $j, '(' );
    $j = rtrim( $j, ')' );
    $a = preg_split('#(?<!\\\\)\"#', $j );
    for( $i=0; $i < count( $a ); $i+=2 ){
        $s = $a[$i];
        $s = preg_replace('#([^\s\[\]\{\}\:\,]+):#', '"\1":', $s );
        $a[$i] = $s;
    }
    //var_dump($a);
    $j = implode( '"', $a );
    //var_dump( $j );
    return $j;
}