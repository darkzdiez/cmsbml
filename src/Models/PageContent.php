<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageContent extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages_content';

	public function Page()
	{
		return $this->belongsTo('\Hard\CmsBml\Models\PageContent', 'page_id');
	}

}