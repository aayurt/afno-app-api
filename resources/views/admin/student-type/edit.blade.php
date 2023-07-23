@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.student-type.actions.edit', ['name' => $studentType->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <student-type-form
                :action="'{{ $studentType->resource_url }}'"
                :data="{{ $studentType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.student-type.actions.edit', ['name' => $studentType->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.student-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </student-type-form>

        </div>
    
</div>

@endsection