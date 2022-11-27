
<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php
            $count = App\Models\AdminNotifications::where("isRead", 0)->get()->count();
        ?>
        <span class="badge badge-danger badge-counter"> {{  $count > 9 ? "9+" : $count  }} </span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
           Notifications
        </h6>
                                    
       @foreach (App\Models\AdminNotifications::where("isRead", 0)->get() as $item)
        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                <div class="mr-3">
                    <div class="icon-circle bg-{{$item->type}}">
                        @if ($item->type == "danger")
                         <i class="fas fa-exclamation-triangle text-white"></i>
                        @elseif(  $item->type == "success" )
                            <i class="fas fa-check text-white"></i>
                        @elseif(  $item->type == "warning" ) 
                          <i class="fas fa-exclamation text-white"></i>
                        @elseif(  $item->type == "primary" )  
                         <i class="fas fa-info-circle text-white"></i>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{ format_date( $item->created_at, "H:i - d F" ) }}</div>
                    {{ $item->title  }}
                </div>
            </a>
       @endforeach
   




        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>
