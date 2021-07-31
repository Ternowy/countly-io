export default ($axios, config = {}) => ({
  requestEmailAuth: (email) => {
    return new Promise((resolve, reject) => {
      $axios.post(config.emailAuth, {email}).
          then(({data}) => resolve(data)).
          catch(reject);
    });
  },
});