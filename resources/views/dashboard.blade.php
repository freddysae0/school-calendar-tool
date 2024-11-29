@extends('layouts.app')

@section('content')
    <x-head-content></x-head-content>

    <body class="g-sidenav-show container bg-gray-100">

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-2">
                <div class="row mb-4">
                    <div class="ms-3">
                        <h3 class="mb-0 h4 font-weight-bolder">{{ $school->name }}</h3>

                        <p class="d-flex mb-4 text-sm">
                            <span class="me-3">
                                <a href="
                                    {{ ($baseUrl = config('app.url')) . $school->link }}
                                "
                                    target="_blank">
                                    {{ ($baseUrl = config('app.url')) . $school->link }}
                                </a>
                            </span>
                            <span>
                                {{ $school->address . ' ' . $school->phone }}
                            </span>
                        </p>

                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Total of users</p>
                                        <h4 class="mb-0">{{ $school->users->count() }}</h4>
                                    </div>
                                    <x-icon-in-square icon="person"></x-icon-in-square>

                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Total of groups</p>
                                        <h4 class="mb-0">{{ $school->groups->count() }}</h4>
                                    </div>
                                    <x-icon-in-square icon="group"></x-icon-in-square>

                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Total of classes</p>
                                        <h4 class="mb-0">
                                            {{ $school->groups->flatMap(function ($group) {
                                                    return $group->subjects;
                                                })->count() }}
                                        </h4>
                                    </div>
                                    <x-icon-in-square icon="book"></x-icon-in-square>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">

                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                                <div
                                    class="d-flex justify-content-between px-3 bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Groups in the School</h6>


                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#createGroupModalCenter" data-toggle="modal"
                                        data-target="#createGroupModalCenter">
                                        <p class="text-light">Add Group</p>
                                    </button>


                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Url</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Buttons</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($school->groups as $group)
                                                <tr id="group-row-{{ $group->id }}">
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="../assets/img/team-2.jpg"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $group->name }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $school->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ config('app.url') . '/' . $school->link . '/' . $group->code }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($group->is_active == true)
                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                        @elseif ($group->is_active == false)
                                                            <span class="badge badge-sm bg-gradient-warning">Stopped</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle text-center text-sm ">
                                                        <a @if ($group->is_active == false) style="opacity: 0; pointer-events: none;" @endif
                                                            href="{{ route('groups.show', ['schoolname' => $school->link, 'group_code' => $group->code]) }}">
                                                            <button class="btn" type="submit">
                                                                <i
                                                                    class="material-symbols-rounded opacity-10 cursor-pointer">
                                                                    Visibility </i></button>
                                                        </a>

                                                        <button type="submit" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#editGroupModalCenter-{{ $group->id }}"
                                                            data-toggle="modal"
                                                            data-target="#editGroupModalCenter-{{ $group->id }}"
                                                            form="show-calendar-form-{{ $group->id }}">
                                                            <i
                                                                class="material-symbols-rounded opacity-10 cursor-pointer">Event</i>

                                                        </button>
                                                        <button type="button" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#editGroupModalCenter-{{ $group->id }}"
                                                            data-toggle="modal"
                                                            data-target="#editGroupModalCenter-{{ $group->id }}">
                                                            <i
                                                                class="material-symbols-rounded opacity-10 cursor-pointer">Edit</i>

                                                        </button>

                                                        <button class="btn delete-group" type="submit"
                                                            form="delete-form-{{ $group->id }}">
                                                            <i
                                                                class="material-symbols-rounded opacity-10 cursor-pointer">delete</i>
                                                        </button>

                                                        <form data-id="{{ $group->id }}" class="delete-form"
                                                            id="delete-form-{{ $group->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <form id="show-calendar-form-{{ $group->id }}" method="GET"
                                                            action="{{ route('dashboard.schedule', $group->id) }}">

                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-create-group :school="$school->id"></x-edit-group>

                    @foreach ($school->groups as $group)
                        <x-edit-group :group="$group"></x-edit-group>
                    @endforeach
            </div>
        </main>

    </body>



    <script type="text/javascript">
        $(document).ready(function() {
            // Maneja la eliminación de un grupo
            $('.delete-form').submit(function(e) {
                e.preventDefault();


                var groupId = $(this).data('id'); // Obtén el ID del grupo desde el atributo data-id
                console.log(groupId);

                var url = '/groups/' + groupId;
                var formData = groupId
                if (confirm("Are you sure you want to delete this group?")) {

                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            $('#group-row-' + groupId).remove();
                        },
                        error: function(response) {
                            alert('An error occurred while deleting the group');
                        }
                    });

                }

            });
        });
    </script>
@endsection
