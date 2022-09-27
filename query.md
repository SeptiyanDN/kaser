<!-- query untuk mencari article berdasarkan user yang email nya verify -->
<!-- 
Article::query()
    ->whereHas('user', function($query){
        return $query->where('email_verified_at','!=', null)
    })
    ->get();


Article::query()
    ->whereHas('user',fn($query) => $query
    ->where('email_verified_at,'!=',null))
    ->get();

Article::query()
->whereRelation('user','email_verified_at','!=',null)
->get(); -->

<!-- menampilkan data with user / relations -->
Article::query()
    ->witWwhereHas('user',fn($query) => $query
    ->where('email_verified_at,'!=',null))
    ->get();
