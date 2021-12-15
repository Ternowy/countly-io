class AnswerQualityService {
  getQuality (rating) {
    if (rating >= 7) {
      return 'good';
    } else if (rating >= 5) {
      return 'medium'
    } else {
      return 'poor';
    }
  }
}

export default new AnswerQualityService();