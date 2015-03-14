<?php namespace Illuminate\Pagination;

class BootstrapPresenter extends Presenter {

	/**
	 * Get HTML wrapper for a page link.
	 *
	 * @param  string  $url
	 * @param  int  $page
	 * @param  string  $rel
	 * @return string
	 */
	public function getPageLinkWrapper($url, $page, $rel = null)
	{
		$rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

		return '<div class="col s1"><a class="btn-flat grey-text text-lighten-5 waves-effect waves-light" href="'.$url.'"'.$rel.'>'.$page.'</a></div>';
	}

	/**
	 * Get HTML wrapper for disabled text.
	 *
	 * @param  string  $text
	 * @return string
	 */
	public function getDisabledTextWrapper($text)
	{
		return '<div class="col s1"><a class="btn-flat disabled grey-text text-lighten-5 waves-effect waves-light">'.$text.'</a></div>';
	}

	/**
	 * Get HTML wrapper for active text.
	 *
	 * @param  string  $text
	 * @return string
	 */
	public function getActivePageWrapper($text)
	{
		return '<div class="col s1"><a class="btn-flat disabled blue-grey darken-3 grey-text text-lighten-5">'.$text.'</a></div>';
	}

}
