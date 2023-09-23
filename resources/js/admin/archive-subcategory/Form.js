import AppForm from "../app-components/Form/AppForm";

Vue.component("archive-subcategory-form", {
    mixins: [AppForm],
    props: ["archiveCategories"],
    data: function() {
        return {
            form: {
                title: "",
                description: "",
                archive_category_id: ""
            }
        };
    }
});
