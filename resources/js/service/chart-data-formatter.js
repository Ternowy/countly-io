class ChartDataFormatter {
  formatData(data = {}, labelKey, valueKey) {
    let formatted = [];

    Object.keys(data).forEach(
        (key, index) => formatted.push({
          [labelKey]: index + 1,
          [valueKey]: data[key]
        }),
    );

    return formatted;
  }


}

export default new ChartDataFormatter();