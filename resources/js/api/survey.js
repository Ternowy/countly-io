export default ($axios, config) => ({
  create: (survey) => {
    return new Promise((resolve, reject) => {
      $axios.post(config.create, survey)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  update: (survey) => {
    return new Promise((resolve, reject) => {
      $axios.post(config.update, survey)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  }
});