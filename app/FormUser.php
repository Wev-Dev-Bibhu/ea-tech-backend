<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormUser extends Model
{
    protected $table = 'users'; // Specify the table name if different
    protected $fillable = ['full_name', 'email', 'phone', 'industry_option_id', 'job_title_option_id', 'company_option_id'];

    public function industryOption()
    {
        return $this->belongsTo(Option::class, 'industry_option_id');
    }
    public function jobTitleOption()
    {
        return $this->belongsTo(Option::class, 'job_title_option_id');
    }
    public function companyOption()
    {
        return $this->belongsTo(Option::class, 'company_option_id');
    }
}
