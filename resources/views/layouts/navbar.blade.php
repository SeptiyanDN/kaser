<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        <form role="search" class="navbar-form-custom" action="search_results.html">
            <div class="form-group">
                <input type="text" placeholder="Pencarian Pintar..." class="form-control" name="top-search" id="top-search">
            </div>
        </form>
    </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle label label-warning" data-toggle="dropdown" href="#">
                    Usaha Lainya <i class="fa fa-bank"></i>   <span class="label label-primary">{{auth()->user()->tenants()->count()}}</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @if (Auth::user()->tenants()->count() >= 1)
                     @foreach (Auth::user()->tenants as $tenant )
                    <li>
                        <a href="{{route('tenants.change',$tenant->id)}}">
                            <div>
                                <span class="@if (Auth::user()->current_tenant_id == $tenant->id)
                                    font-bold                                    
                                @endif"><i class="fa-envelope fa fa-bank"></i> {{$tenant->name}}</span>
                                
                                <span class="pull-right text-muted small">Kunjungi</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    @endforeach
                    @endif


                       
                </ul>
                
            </li> 
            
           
            <select class="js-example-basic-single" onchange="window.location.href=this.value;" style="width: 215px !important"  name="state">
                @if (Auth::user()->tenants()->count() >= 1)
                <option value="{{route('tenants.change',$tenant->id)}}">Pilihan Usaha</option>
                @foreach (Auth::user()->tenants as $tenant )
                <option value="{{route('tenants.change',$tenant->id)}}">{{$tenant->name}}</option>
                @endforeach
                @endif
             </select>
            <li>
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
           
        </ul>

    </nav>
