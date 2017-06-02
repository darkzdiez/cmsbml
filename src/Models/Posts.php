<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model {
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	public function terms()
	{
		return $this->belongsToMany('App\Term', 'post_term', 'post_id', 'terms_id');
	}

	public function author()
	{
		return $this->belongsTo('\App\User', 'user_id');
	}
	public function revision() {
		return $this->hasMany('\App\Posts', 'post_parent', 'id');
	}
	public function original(){
		return $this->belongsTo('\App\Posts', 'post_parent', 'id');
	}

}