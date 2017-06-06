<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Facades\Hard\CmsBml\Date;

class Content extends Model {
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'content';
	public function terms()
	{
		return $this->belongsToMany('\Hard\CmsBml\Models\Term', 'content_term', 'content_id', 'terms_id');
	}
	public function dateText(){
		return Date::getDateText($this->created_at);
	}
	public function author()
	{
		return $this->belongsTo('\Hard\CmsBml\Models\User', 'user_id');
	}
	public function revision() {
		return $this->hasMany('\Hard\CmsBml\Models\Content', 'content_parent', 'id');
	}
	public function original(){
		return $this->belongsTo('\Hard\CmsBml\Models\Content', 'content_parent', 'id');
	}

}