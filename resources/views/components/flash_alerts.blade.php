@if ( session('message') )        
    @component( 'components.alert' )
        @slot( 'class', 'success' )
        @slot( 'name', 'Success' )
        @slot( 'message', session('message') )
    @endcomponent
@endif
@if (session('info'))
    @component( 'components.alert' )
        @slot( 'class', 'info' )
        @slot( 'name', 'Information' )
        @slot( 'message', session('info') )
    @endcomponent
@endif
@if (session('warning'))
    @component( 'components.alert' )
        @slot( 'class', 'warning' )
        @slot( 'name', 'Warning' )
        @slot( 'message', session('warning') )
    @endcomponent
@endif
@if (session('danger'))
    @component( 'components.alert' )
        @slot( 'class', 'danger' )
        @slot( 'name', 'Danger' )
        @slot( 'message', session('danger') )
    @endcomponent
@endif
@if ( $errors->any() )
    @foreach ( $errors->all() as $error )
        @component( 'components.alert' )
            @slot( 'class', 'danger' )
            @slot( 'name', 'Error' )
            @slot( 'message', $error )
        @endcomponent
    @endforeach
@endif