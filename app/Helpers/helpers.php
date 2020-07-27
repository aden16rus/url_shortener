<?
function getExpirationTime($delay)
{
    return now()->addSeconds($delay * 60)->timestamp;
}

function sanitize_url($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
}

function my_bcmod( $x, $y )
{
    // how many numbers to take at once? carefull not to exceed (int)
    $take = 5;
    $mod = '';

    do
    {
        $a = (int)$mod.substr( $x, 0, $take );
        $x = substr( $x, $take );
        $mod = $a % $y;
    }
    while ( strlen($x) );

    return (int)$mod;
}
