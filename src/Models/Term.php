<?php
namespace Hard\CmsBml\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model {
	use SoftDeletes;
	protected $table = 'terms';
	public function Posts() {
		return $this->belongsToMany('\Hard\CmsBml\Models\Content', 'post_term', 'terms_id', 'post_id');
	}
	public function Child() {
		return $this->hasMany('\Hard\CmsBml\Models\Term', 'parent', 'id');
	}
	public function Parent(){
		return $this->belongsTo('\Hard\CmsBml\Models\Term', 'parent', 'id');
	}
}