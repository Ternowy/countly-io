import AnswerQualityService from './answer-quality-service.js';

class TableDataFormatter {
  formatData (data = [], structure = {}) {
    const fields = Object.keys(structure)

    return data.map(({ inputs, created_at, quality }) => {
      return {
        value: fields.map(fieldName => {
          const field = inputs.find(({input_name}) => input_name === fieldName)

          if (field) {
            return {
              value: Array.isArray(field.value)
                ? field.value.join(', ')
                : field.value,
            }
          }

          return {
            value: ' ',
          }
        }),
        created_at,
        quality: quality ? AnswerQualityService.getQuality(quality.quality_rating) : 'unknown'
      }
    })
  }

}

export default new TableDataFormatter()