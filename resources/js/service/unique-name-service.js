import uniqueString from 'unique-string';

class UniqueNameService {
  generate() {
    return uniqueString();
  }
}

export default new UniqueNameService();