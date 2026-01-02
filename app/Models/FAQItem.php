<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQItem extends Model
{   
    protected $table = 'faq_items';
    protected $fillable = ['faq_category_id', 'question', 'answer'];

    public function category()
    {
        return $this->belongsTo(FAQCategory::class, 'faq_category_id');
    }
}
