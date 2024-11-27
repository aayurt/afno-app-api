import AppForm from '../app-components/Form/AppForm';

Vue.component('food-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                restaurant_id:  '' ,
                title:  '' ,
                type:  '' ,
                tags:  '' ,
                price:  '' ,
            }
        }
    },
});
