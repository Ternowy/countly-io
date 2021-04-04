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
      $axios.put(config.update, survey)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  delete: (endpoint) => {
    return new Promise((resolve, reject) => {
      $axios.delete(endpoint)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
});