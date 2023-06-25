import AppForm from "../app-components/Form/AppForm";

Vue.component("member-category-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults()
            }
        };
    }
});
