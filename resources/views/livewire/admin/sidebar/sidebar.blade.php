<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @php
                    $types = \App\Models\Droit::all()->groupBy('type_droit_id');
                @endphp


                <li class="active">
                    <a href="{{ url('/admin/home') }}"><img
                            src="{{ URL::to('admin-template/assets/img/icons/dashboard.svg') }}"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                @foreach ($types as $key => $type)
                    @php
                        $elements = 0;
                        $droitAutorises =[] ;
                        foreach ($type as $id => $droit) {
                            $droitAutorises = DB::table('droit_role')
                                                        ->where('role_id', '=',Auth::user()->role->id)
                                                        ->where('droit_id', '=',$droit->id)
                                                        ->get("id");
                            if (count($droitAutorises)) {
                                $elements += 1;
                            }                              
                        }

                    @endphp
                    @if($elements > 0)                 
                        <li class="submenu">
                            <a href="javascript:void(0);"><img
                                    src="{{ URL::to('admin-template/assets/img/icons/product.svg') }}"
                                    alt="img"><span>{{\App\Models\TypeDroit::find($key)->nom}}</span> <span class="menu-arrow"></span></a>
                            <ul>
                                @forelse ($type as $droit)
                                    @php
                                        $droitAutorises = DB::table('droit_role')
                                                            ->where('role_id', '=',Auth::user()->role->id)
                                                            ->where('droit_id', '=',$droit->id)
                                                            ->get("id");

                                    @endphp 
                                    @if(count($droitAutorises))                                      
                                        <li><a href="{{ route($droit->route) }}">{{$droit->nom}}</a></li>
                                    @endif
                                @empty
                                    
                                @endforelse
                            

                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</div>