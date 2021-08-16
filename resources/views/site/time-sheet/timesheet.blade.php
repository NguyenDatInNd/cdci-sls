@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <fieldset class="p-3 mb-3" style="border: 1px solid; border-radius: 15px">
                    <legend class="w-auto">Time sheet</legend>

                    @include('components.flash-message')

                    <form action="{{route('timesheet.store')}}" method="POST">
                        @csrf
                        <div class="form-group-row mb-3">
                            @include('components.select', [
                                    'name' => 'job_name',
                                    'label' => 'Tên công việc',
                                    'options' => $nameJobs
                                ])
                        </div>
                        <div class="form-group-row mb-3">
                            @include('components.select', [
                                   'name' => 'process_method',
                                   'label' => 'Đối tượng xử lý',
                                   'options' => $staffs
                               ])
                            <label for="process_method" class="ml-5">(Hình thức xử lý)</label>
                        </div>
                        <div class="form-group-row mb-3">
                            @include('components.input-date', [
                                'type' => 'date',
                                'name' => 'from_date',
                                'label' => 'Từ ngày',

                            ])
                            @include('components.input-date', [
                                'type' => 'date',
                                'name' => 'to_date',
                                'label' => 'Đến ngày',

                            ])
                        </div>
                        <div class="form-group-row mb-3">
                            @include('components.input-date', [
                                'type' => 'time',
                                'name' => 'from_time',
                                'label' => 'Từ giờ',

                            ])
                            @include('components.input-date', [
                                'type' => 'time',
                                'name' => 'to_time',
                                'label' => 'Đến giờ',

                            ])
                        </div>
                        <div class="form-group-row mb-3">
                            @include('components.input-text', [
                                'name' => 'percentage_completed',
                                'label' => '% hoàn thành',
                            ])

                        </div>
                        <div class="form-group-row mb-3">
                            @include('components.text-area', [
                                'name' => 'content',
                                'label' => 'Nội dung',
                            ])

                        </div>

                        @include('components.button-group', [
                            'buttons' => [
                                ['iconClass' => 'fas fa-save', 'value' => 'Lưu' ],
                            ]
                        ])

                        @include('components.span-modal', [
                           'value' => 'Xóa'
                       ])

                    </form>
                </fieldset>
            </div>
            <div class="col-md-4">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Ngày nhập time sheet</th><th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($timeSheets as $timesheet)
                        <tr>
                            <td>{{date_format($timesheet->created_at, 'Y-m-d')}}</td>
                            <td><a href="{{route('timesheet.edit',['id'=>$timesheet['id']])}}" class="btn btn-primary">Xem</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$timeSheets->links()}}
            </div>
        </div>
    </div>

@endsection