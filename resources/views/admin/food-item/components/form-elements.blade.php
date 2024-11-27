<div class="form-group row align-items-center" :class="{'has-danger': errors.has('restaurant_id'), 'has-success': fields.restaurant_id && fields.restaurant_id.valid }">
    <label for="restaurant_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.restaurant_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="restaurant_id" id="restaurant_id" v-model="form.restaurant_id" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('restaurant_id'), 'form-control-success': fields.restaurant_id && fields.restaurant_id.valid}" required>
            @foreach($restaurants as $restaurant )
            <option value="{{$restaurant->id}}">{{ $restaurant->title}}</option>
            @endforeach

        </select>
        <div v-if="errors.has('restaurant_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('restaurant_id') }}</div>
    </div>
</div>
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('restaurant_id'), 'has-success': fields.restaurant_id && fields.restaurant_id.valid }">
    <label for="restaurant_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.restaurant_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.restaurant_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('restaurant_id'), 'form-control-success': fields.restaurant_id && fields.restaurant_id.valid}" id="restaurant_id" name="restaurant_id" placeholder="{{ trans('admin.food-item.columns.restaurant_id') }}">
        <div v-if="errors.has('restaurant_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('restaurant_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.food-item.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type" placeholder="{{ trans('admin.food-item.columns.type') }}">
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tags'), 'has-success': fields.tags && fields.tags.valid }">
    <label for="tags" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.tags') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect  v-model="form.tags" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}"  :options="{{ $foodItemtags->toJson() }}" :multiple="true" open-direction="bottom"></multiselect>
        <div v-if="errors.has('tags')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tags') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.food-item.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>


