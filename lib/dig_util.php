<?
/*
* Artistech Media has made the contents of this file
* available under a CC-GNU-GPL license:
*
* http://creativecommons.org/licenses/GPL/2.0/
*
* A copy of the full license can be found as part of this
* distribution in the file LICENSE.TXT.
* 
* You may use dig.ccMixter software in accordance with the
* terms of that license. You agree that you are solely 
* responsible for your use of dig.ccMixter software and you
* represent and warrant to Artistech Media that your use
* of dig.ccMixter software will comply with the CC-GNU-GPL.
*
* $Id$
*
*/

require_once('lib/util.php');


function prep_dig_query_args($digQuery)
{
    if( !empty($digQuery->raw_args->args['dataview']) )
        return array();
    
    $args = array(
        'dataview' => 'diginfo',
        'sort'    => 'rank',
        'limit'    => 10,
        'search_type' => 'all',
        'tagexp'  => '(remix|contest_entry|conetest_source)',
    );

    $F =& $digQuery->_fields;
    
    // map these straight across

    foreach( array( 'dig-query' => 'search',
                    'dig-lic' => 'lic',
                    'dig-sort' => 'sort',
                    'dig-ord' => 'ord',
                    'dig-limit' => 'limit',
                    'dig-stype' => 'search_type',
                    'dig-since' => 'sinced',
                    'dig-tags' => 'tags',                    
                    ) as $K => $V )
    {
        if( array_key_exists($K,$F) )
            $args[$V] = $F[$K];
    }
    
    
    // first, map 'instrumental' search to tags because
    // otherwise, every time someone even mentions
    // 'instrumental' in their description it would
    // get a hit.

    if( !empty($args['search']) )
    {
        $tstr = trim($args['search']);
        if( $tstr == 'instrumental' )
        {
            $args['search'] = '';
            if( empty($args['title']))
            {
                $args['title'] = 'Music Marked: Instrumental';
            }
            
            if( empty($args['tagexp']) )
            {
                $args['tagexp'] = 'instrumental';
            }
            else
            {
                $args['tagexp'] .= '*instrumental';
            }
        }
    }
    
    return $args;   
}

?>