class ChartDataFormatter {
  formatData(data = {}, labelKey, valueKey) {
    let formatted = [];

    Object.keys(data).forEach(
        (key) => formatted.push({
          [labelKey]: key,
          [valueKey]: data[key]
        }),
    );

    return formatted;
  }


}

export default new ChartDataFormatter();