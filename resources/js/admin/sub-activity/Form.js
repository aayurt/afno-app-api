import AppForm from "../app-components/Form/AppForm";

Vue.component("sub-activity-form", {
    mixins: [AppForm],
    props: ["activities"],
    data: function() {
        return {
            form: {
                activity_id: "",
                title: "",
                subtitle: "",
                body: "",
                link: "",
                enabled: false
            }
        };
    }
});
