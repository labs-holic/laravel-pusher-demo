<template>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <form action="/notifications" method="POST" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
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
              <i v-if="form.errors.has('title')" class="fa fa-warning"></i>

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
              <i v-if="form.errors.has('message')" class="fa fa-warning"></i>

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
  class Errors {
    
    constructor() {
      this.errors = {};
    }

    get(field) {
      if (this.errors[field]) {
        return this.errors[field][0]
      }
    }

    record(errors) {
      this.errors = errors
    }

    clear(field) {
      if (field) {
        delete(this.errors[field])
        return
      }

      this.errors = {}
    }

    has(field) {
      return this.errors.hasOwnProperty(field)
    }

    any() {
      return Object.keys(this.errors).length > 0
    }
  }

  class Form {

    constructor(data) {
      this.originalData = data
      
      for (let field in data) {
        this[field] = data[field]
      }

      this.errors = new Errors()
      this.submitting = false
    }

    reset() {
      for (let field in this.originalData) {
        this[field] = ''
      }

      this.errors.clear()
    }

    data() {
      let data = {}

      for (let property in this.originalData) {
        data[property] = this[property]
      }

      return data
    }

    post(url) {
      return this.submit('post', url)
    }

    delete(url) {
      return this.submit('delete', url)
    }

    get(url) {
      return this.submit('get', url)
    }

    submit(method, url) {
      this.submitting = true

      return new Promise((resolve, reject) => {
        axios[method](url, this.data())
          .then(response => {
            this.submitting = false
            this.onSuccess(response.data)

            resolve(response.data)
          })
          .catch(error => {
            this.submitting = false
            this.onFail(error.response.data)

            reject(error.response.data)
          })
      })
    }

    onSuccess(data) {
      this.reset()
    }

    onFail(error) {
      this.errors.record(error)
    }
  }

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
        this.form.post('/notifications')
          .then(data => console.log(data))
          .catch(errors => console.log(errors))
      }
    }
  }
</script>