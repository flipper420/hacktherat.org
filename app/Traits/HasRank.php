<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use InvalidArgumentException;
use App\Models\Rank;

trait HasRank
{
    /**
     * Property for caching ranks.
     *
     * @var Collection|null
     */
    protected $rank;

     /**
     * User has one rank.
     *
     * @return HasOne
     */
    public function ranks()
    {
        return $this->belongsToMany('App\Models\Rank')->withTimestamps();
    }

    /**
     * Get rank as collection.
     *
     * @return Collection
     */
    public function getRank()
    {
        return (!$this->rank) ? $this->rank = $this->ranks()->get() : $this->rank;
    }

    /**
     * Check if the user has the given rank.
     *
     * @param int|string $rank
     *
     * @return bool
     */
    public function hasRank($rank)
    {
    	return ($this->checkrank($rank)) ? true : false;
    }

    /**
     * Attach rank to a user.
     *
     * @param int|rank $rank
     *
     * @return null|bool
     */
    public function attachRank($rank)
    {
        if ($this->getRank()->contains($rank)) {
            return true;
        }
        $this->ranks = null;

        return $this->ranks()->attach($rank);
    }
}