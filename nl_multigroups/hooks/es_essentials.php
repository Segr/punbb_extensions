<?
if (!defined('FORUM')) die();

function multigroups_updatequery_forumpermission($query, $multigroups='') {
	global $forum_db;
	$multigroups = array_filter(array_map('intval', explode(',', $multigroups)));
	if (count($multigroups)>0 && isset($query['JOINS'])) {
		foreach (array_keys($query['JOINS']) as $key) {
			$joinkey = key($query['JOINS'][$key]);
			if (preg_match('~forum_perms\s+as\s+fp~i', $query['JOINS'][$key][$joinkey])) {
				if (preg_match('~(fp\.forum_id\s*=\s*(\w+)\.(\w+))\s+and\s+fp\.group_id\s*=\s*(\d+)~i', $query['JOINS'][$key]['ON'], $match)) {
					$tempquery = array(
						'SELECT'	=> 'tfp.group_id as group_id, tfp.forum_id as forum_id, max(tfp.read_forum) as read_forum, max(tfp.post_replies) as post_replies, max(tfp.post_topics) as post_topics',
						'FROM'		=> 'forum_perms as tfp',
						'WHERE'		=> 'tfp.group_id in ('.$match[4].','.implode(',', $multigroups).')',
						'GROUP BY'	=> 'tfp.forum_id'
					);
					$query['JOINS'][$key][$joinkey] = '('.$forum_db->query_build($tempquery, true).') AS fp';
					$query['JOINS'][$key]['ON'] = $match[1];
					
					$query['FROM'] = $forum_db->prefix.$query['FROM'];
					foreach($query['JOINS'] as $k=>$v) {
						if ($k!=$key) {
							$joink = key($query['JOINS'][$k]);
							$query['JOINS'][$k][$joink] = $forum_db->prefix.$query['JOINS'][$k][$joink];
						}
					}
					$query['PARAMS']['NO_PREFIX'] = 1;
					break;
				}
				if (preg_match('~fp\.forum_id=(\d+)\s+AND\s+fp\.group_id\s*=s*u\.group_id~i', $query['JOINS'][$key]['ON'], $match)) {
					$query['JOINS'][$key]['ON'] = str_replace('fp.group_id=u.group_id', '(fp.group_id=u.group_id OR CONCAT(\',\',u.g_multi,\',\') LIKE CONCAT(\'%,\',fp.group_id,\',%\'))', $query['JOINS'][$key]['ON']);
					$query['SELECT'] .= ', MAX(fp.read_forum) as  as tmp_read_forum';
					break;
				}
			}
		}
	}
	$query['PARAMS']['FORUM_PERMISSION_UPDATED'] = 1;
	return $query;
}

function multigroups_updatequery_list($query, $multigroups_type=0) {
	$query['SELECT'] .= ', IF(g.g_id<5, 0, 1) + IF(g.g_title REGEXP \'^[а-яА-Я0-9]\', 0, 2) as g_sort';
	$query['ORDER BY'] = 'g_sort' . (empty($query['ORDER BY'])?'':','.$query['ORDER BY']);
	if ($multigroups_type)
		$query['WHERE'] = (empty($query['WHERE'])?'':$query['WHERE'].' AND ') . '(g.multigroups_type & '.$multigroups_type.')>0';
	return $query;
}

class DBLayer_MultiGroups extends DBLayer {
	function query_build($query, $return_query_string = false, $unbuffered = false) {
		if (isset($query['SELECT']) && isset($query['JOINS']) && !isset($query['PARAMS']['FORUM_PERMISSION_UPDATED'])) {
			global $forum_user;
			$multigroups = isset($forum_user['g_multi']) ? $forum_user['g_multi'] : false;
			$debug_backtrace = debug_backtrace();
			if (isset($debug_backtrace[1]['function'])) {
				if ($debug_backtrace[1]['function']=='generate_quickjump_cache')       $multigroups = false;
				if ($debug_backtrace[1]['function']=='createSitemap')                  $multigroups = false;
			}
			if ($multigroups!==false) {
				$query = multigroups_updatequery_forumpermission($query, $multigroups);
			}
		}
		return parent::query_build($query, $return_query_string, $unbuffered);
	}
}

$forum_db->close();
$forum_db = new DBLayer_MultiGroups($db_host, $db_username, $db_password, $db_name, $db_prefix, $p_connect);
