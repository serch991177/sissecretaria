<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="user-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/userprofile.png" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->nombre_completo }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ auth()->user()->cargo }}
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Informacion Del Usario</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @elseif (session('error'))
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('error') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form method='POST' action='{{ route('user-profile') }}'>
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Correo Electronico</label>
                                    <input type="email" name="email" class="form-control border border-2 p-2" value='{{ old('email', auth()->user()->email) }}'>
                                    @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" name="nombre_completo" class="form-control border border-2 p-2" value='{{ old('nombre_completo', auth()->user()->nombre_completo) }}'>
                                    @error('nombre_completo')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Celular</label>
                                    <input type="text" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="celular" class="form-control border border-2 p-2" value='{{ old('celular', auth()->user()->celular) }}'>
                                    @error('celular')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark">Actualizar Datos</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body p-3">
                        <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                                
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label text-center">Contraseña Antigua</label>
                                <input name="old_password" type="password" class="form-control border border-2 p-2 @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Contraseña Antigua">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Contraseña Nueva</label>
                                <input name="new_password" type="password" class="form-control border border-2 p-2 @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="Contraseña Nueva">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirmar Contraseña Nueva</label>
                                <input name="new_password_confirmation" type="password" class="form-control border border-2 p-2" id="confirmNewPasswordInput" placeholder="Confirmar Contraseña Nueva">
                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-success">Cambiar Contraseña</button>
                        </div>

                    </form>
                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
