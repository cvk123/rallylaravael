<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * Define a many-to-many relationship for racers.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function racers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_racers', 'team_id', 'member_id');
    }

    /**
     * Define a many-to-many relationship for managers.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_managers', 'team_id', 'member_id');
    }

    /**
     * Define a many-to-many relationship for photographers.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photographers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_photographers', 'team_id', 'member_id');
    }

    /**
     * Define a many-to-many relationship for mechanics.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mechanics(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_mechanics', 'team_id', 'member_id');
    }

    /**
     * Define a many-to-many relationship for codrivers.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function codrivers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'team_codrivers', 'team_id', 'member_id');
    }
}
