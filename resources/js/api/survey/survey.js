export default ($axios, config) => ({
  create: (survey) => {
    return new Promise((resolve, reject) => {
      $axios
        .post(config.create, survey)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  update: (survey) => {
    return new Promise((resolve, reject) => {
      $axios
        .put(config.update, survey)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  updateStatus: (endpoint, status) => {
    return new Promise((resolve, reject) => {
      $axios
        .put(endpoint, {status})
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  delete: (endpoint) => {
    return new Promise((resolve, reject) => {
      $axios
        .delete(endpoint)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  submit: (answers) => {
    return new Promise((resolve, reject) => {
      $axios
        .post(config.submit, {answers})
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  clearResults: (endpoint) => {
    return new Promise((resolve, reject) => {
      $axios
        .delete(endpoint)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  },
  join: (code) => {
    return new Promise((resolve, reject) => {
      $axios
        .get(`/survey/join/${code}`)
        .then(({data}) => resolve(data))
        .catch(reject);
    });
  }
});