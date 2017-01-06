<template>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <form action="/announcements" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <label class="label">Title</label>
            <p class="control has-icon has-icon-right">
              <input 
                class="input"
                :class="{'is-danger': form.errors.has('title')}"
                id="title"
                name="title"
                type="text"
                placeholder="title"
                v-model="form.title"
              >
              <span v-if="form.errors.has('title')" class="icon is-small">
                <i class="fa fa-warning"></i>
              </span>

              <span class="help is-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
            </p>
            <label class="label">Message</label>
            <p class="control has-icon has-icon-right">
              <textarea
                class="textarea"
                :class="{'is-danger': form.errors.has('message')}"
                id="message"
                name="message"
                placeholder="message"
                v-model="form.message"
              >
              </textarea>
              <span v-if="form.errors.has('title')" class="icon is-small">
                <i class="fa fa-warning"></i>
              </span>
              
              <span class="help is-danger" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span>
            </p>
            <p class="control">
              <button class="button is-primary" :class="{'is-loading': form.submitting}" :disabled="form.errors.any()">Submit</button>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Form from '../core/Form.js';

  export default {
    data() {
      return {
        form: new Form({
          title: '',
          message: ''
        })
      }
    },

    methods: {
      onSubmit() {
        this.form.post('/announcements')
          .then(data => {})
          .catch(errors => console.log(errors))
      }
    }
  }
</script>