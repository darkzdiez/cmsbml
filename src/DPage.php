<?php
namespace Hard\CmsBml;

use Hard\CmsBml\Models\Page;
use Hard\CmsBml\Models\PageContent;
use App;
class DPage
{
	public function getContent($route_name, $key, $lang = null)
	{
		if ($lang == null) {
			$lang = App::getLocale();
		}
		if ($page = Page::where('route_name', $route_name)->first()) {
			if ($content = $page->PageContent()->where('key', $key)->where('lang', $lang)->first()) {
				return $content->content;
			} else {
				return $route_name.'-'.$lang;
			}
		} else {
			if ($route_name == 'home') {
				return '/';
			}
			return $route_name.'-'.$lang;
		}
	}
}
?>