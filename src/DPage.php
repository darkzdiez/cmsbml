<?php
namespace Hard\CmsBml;

use App\Page;
use App\PageContent;
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
			return $route_name.'-'.$lang;
		}
	}
}
?>