@extends('layouts.app')

@section('content')

    <x-head-content></x-head-content>

    <div class="row">
        <div class="col-12">
            <div class="container my-4">

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                    <div class="d-flex justify-content-between px-3 bg-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Subjects of the Group</h6>


                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#createSubjectModalCenter"
                            data-toggle="modal" data-target="#createSubjectModalCenter">
                            <p class="text-light">Add Subject</p>
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

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Subject</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Day</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Time</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Options </th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($group->subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->name }}</td>

                                            <td class="text-center">{{ $days[$subject->pivot->day] }} </td>
                                            <td class="text-center">
                                                {{ $subject->pivot->turn[0] . $subject->pivot->turn[1] . $subject->pivot->turn[2] . $subject->pivot->turn[3] . $subject->pivot->turn[4] }}
                                            </td>
                                            <td class="text-center">



                                                <button class="btn delete-group" type="submit"
                                                    form="delete-subject-form-{{ $group->id }}">
                                                    <i class="material-symbols-rounded opacity-10 cursor-pointer">delete</i>
                                                </button>
                                                <form id="delete-subject-form-{{ $group->id }}"
                                                    action="{{ route('subjects.destroy', [$subject->id, $group->id, $subject->pivot->day, $subject->pivot->turn[0] . $subject->pivot->turn[1] . $subject->pivot->turn[2] . $subject->pivot->turn[3] . $subject->pivot->turn[4]]) }}"
                                                    method="POST">
                                                    @csrf

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
        <x-create-subject-modal :group=$group></x-create-subject-modal>
    </div>



@endsection
