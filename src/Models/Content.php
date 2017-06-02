<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
		return $this->belongsToMany('App\Term', 'content_term', 'content_id', 'terms_id');
	}

	public function author()
	{
		return $this->belongsTo('\App\User', 'user_id');
	}
	public function revision() {
		return $this->hasMany('\App\Content', 'content_parent', 'id');
	}
	public function original(){
		return $this->belongsTo('\App\Content', 'content_parent', 'id');
	}

}