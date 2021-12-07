<template>
    <section>
        <b-field label="Email"
            :label-position="labelPosition"
            type="is-danger"
            message="This email is invalid">
            <b-input type="email"
                placeho="john@"
                maxlength="30">
            </b-input>
        </b-field>

        <b-field label="Password"
            :label-position="labelPosition"
            type="is-warning">
            <b-input value="123" type="password" maxlength="30"></b-input>
        </b-field>

        <b-field>
            <p class="control">
                <b-button label="login" type="is-info" />
            </p>
        </b-field>
    </section>
</template>

<script>
export default {
    layout: 'none',
    data() {
        return {
            labelPosition: 'on-border'
        }
    }
}
</script>
