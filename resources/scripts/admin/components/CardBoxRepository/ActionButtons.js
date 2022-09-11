
import { ref } from 'vue'

export default class ActionButtons {
  
  #stateFocusButtons = null
  #buttons = [];
  #isUnfocusAll = ref(true)

  constructor(arrayButtons) {
    this.#buttons = arrayButtons;
    this.#stateFocusButtons = new Map()
  }

  get buttons() {
    return this.#buttons;
  }
  
  get refUnfocusAll() {
    return this.#isUnfocusAll.value
  }
  
  isActive(id) {
    return this.buttons.find((btn) => btn.id == id).isActive.value
  }

  clickButton(el, btn) {
    const isFocusElem = () => {
      return this.#stateFocusButtons.has(el) && this.#stateFocusButtons.get(el);
    };
    const focusElem = () => {
      this.#stateFocusButtons.set(el, true);
      this.#isUnfocusAll.value = false
    };

    const unfocusElem = () => {
      el.blur();
      this.#stateFocusButtons.set(el, false);

      // is not active all buttons
      const countNotIsActive = this.#buttons.filter(
        (val) => !val.isActive.value
      );

      if (countNotIsActive.length == this.#buttons.length) {
        this.#isUnfocusAll.value = true
      }
    };

    const unfocusOtherwise = () => {
      this.#stateFocusButtons.forEach((val, elem) => {
        if (elem != el) {
          this.#stateFocusButtons.set(elem, false);
        }
      });
      this.#buttons.forEach((arrItemBtn) => {
        if (arrItemBtn.id != btn.id) {
          btnSetIsActive(arrItemBtn, false);
        }
      });
    };

    const btnSetIsActive = (btnLink, val = true) => {
      if (btnLink.hasOwnProperty("isActive")) {
        btnLink.isActive.value = val;
      }
    };

    if (!isFocusElem()) {
      btn.click();
      focusElem();
      btnSetIsActive(btn, true);
      unfocusOtherwise();
    } else {
      btnSetIsActive(btn, false);
      unfocusElem();
    }
  }
}
