class AdoptionRequest extends Model
{
protected $fillable = ['user_id', 'pet_id', 'status'];

public function user()
{
return $this->belongsTo(User::class);
}

public function pet()
{
return $this->belongsTo(Pet::class);
}
}
