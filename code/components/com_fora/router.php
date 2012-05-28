<?php
function foraBuildRoute(&$query)
{
    $segments = array();
    
    if (isset($query['view'])) {
        $segments[] = $query['view'] == 'topics' ? 'forum' : $query['view'];
        unset($query['view']);
    }
    
    if (isset($query['id'])) {
        $id = $query['id'];
        unset($query['id']);
        
        if (isset($query['slug'])) {
            $id .= strlen($query['slug']) ? '-'.$query['slug'] : '';
            unset($query['slug']);
        }
        
        $segments[] = $id;
    }
    
    if (isset($query['forum']) && $segments[0] == 'forum') {
        $forum = $query['forum'];
        unset($query['forum']);
        
        if (isset($query['slug'])) {
            $forum .= strlen($query['slug']) ? '-'.$query['slug'] : '';
            unset($query['slug']);
        }
        
        $segments[] = $forum;
    }
    
    if (isset($query['layout'])) {
        if ($query['layout'] != 'default') {
            $segments[] = $query['layout'];
        }
        unset($query['layout']);
    }
    
    return $segments;
}

function foraParseRoute($segments)
{
    $vars = array();
    
    if (isset($segments[0])) {
        $vars['view'] = $segments[0] == 'forum' ? 'topics' : $segments[0];
    }
    
    if (isset($segments[1])) {
        if (strpos($segments[1], ':') || is_numeric($segments[1])) {
            $parts = explode(':', $segments[1], 2);
            
            if ($segments[0] == 'forum') {
                $vars['forum'] = $parts[0];
            } else {
                $vars['id'] = $parts[0];
            }
                    
            if (isset($parts[1]) && strlen($parts[1])) {
                $vars['slug'] = $parts[1];
            }
        } else {
            $vars['layout'] = $segments[1];
        }
    }
    
    if (isset($segments[2]) && !isset($vars['layout'])) {
        $vars['layout'] = $segments[2];
    }
    
    return $vars;
}