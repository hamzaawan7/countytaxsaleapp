        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
            </div>
        @endif
       @if(session('warning'))
            <div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('warning') }}
            </div>
        @endif
       @if(session('danger'))
            <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('danger') }}
            </div>
        @endif
        @if(session('estatus'))
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('estatus') }}
            </div>
        @endif