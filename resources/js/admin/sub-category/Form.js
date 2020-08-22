import AppForm from "../app-components/Form/AppForm";

Vue.component("sub-category-form", {
    mixins: [AppForm],
    props: ["categories"],
    data: function() {
        return {
            form: {
                sub_title: this.getLocalizedFormDefaults(),
                description: this.getLocalizedFormDefaults(),
                category_id: ""
            }
        };
    }
});
