<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model {
	use SoftDeletes;
	protected $table = 'terms';
	public function Posts() {
		return $this->belongsToMany('App\Posts', 'post_term', 'terms_id', 'post_id');
	}
	public function Child() {
		return $this->hasMany('\App\Term', 'parent', 'id');
	}
	public function Parent(){
		return $this->belongsTo('\App\Term', 'parent', 'id');
	}
}