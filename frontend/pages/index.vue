<template>
  <section class="section">
    <div class="container">
      <div class="content">
        <div class="columns">
          <div class="column is-4 is-offset-4">
            <Notification :message="error" v-if="error"/>
            <form method="post" @submit.prevent="game">
              <div class="field">
                <label class="label">Enter String for game (numbers delimited by comma)</label>
                <div class="control">
                  <input
                    type="text"
                    class="input"
                    name="gamestring"
                    placeholder="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,0"
                    v-model="form.gamestring"
                  >
                </div>
              </div>
              <div class="control">
                <button type="submit" class="button is-dark is-fullwidth">Create game</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Notification from '~/components/Notification'
export default {
  components: {
    Notification,
  },
  data() {
    return {
      form: {
        gamestring: ''
      },
      error: null
    }
  },
  methods: {
    async game() {
      console.log(this.form)
      try {
        let res = await this.$axios.$post('/game', {
          gamestring: this.form.gamestring
        })
        console.log(res)
        this.$router.push('/game')
      } catch (e) {
        console.log(e.response)
        this.error = e.response.statusText
      }
    }
  }
}
</script>
