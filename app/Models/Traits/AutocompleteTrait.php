<?php


namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Builder;

trait AutocompleteTrait
{
  /**
   * Scope for autocomplete
   *
   * @param Builder $query
   * @param string $keyword
   *
   * @return Builder
   */
  public function scopeKeyword(Builder $query, string $keyword): Builder {
    return $query->where('name', 'LIKE', "%$keyword%");
  }
}