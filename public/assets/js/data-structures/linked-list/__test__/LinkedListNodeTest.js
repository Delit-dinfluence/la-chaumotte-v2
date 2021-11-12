describe('Class - LinkedListNode', () => {

    it('Should create a list with only one node with a value', () => {
        const node = new LinkedListNode(1);

        expect(node.value).toBe(1);
        expect(node.next).toBeNull();
    });

    it('Should create a list with only one node with an object as a value', () => {
        const nodeValue = { value: 1, key: 'test' };
        const node = new LinkedListNode(nodeValue);

        expect(node.value.value).toBe(1);
        expect(node.value.key).toBe('test');
        expect(node.next).toBeNull();
    });

    it('Should create a list with two node (Head: 1) and (Tail: 2)', () => {
        const node2 = new LinkedListNode(2);
        const node1 = new LinkedListNode(1, node2);

        expect(node1.next).toBeDefined();
        expect(node2.next).toBeNull();
        expect(node1.value).toBe(1);
        expect(node1.next.value).toBe(2);
    });

    it('Should print node1 value as a string', () => {
        const node2 = new LinkedListNode(2);
        const node1 = new LinkedListNode(1, node2);

        expect(node1.toString()).toBe('1');

        node1.value = 'Change string value';
        expect(node1.toString()).toBe('Change string value');
    });

    it('Should print node with a custom stringifier', () => {
        const nodeValue = { value: 1, key: 'test' };
        const node = new LinkedListNode(nodeValue);
        const toStringCallback = value => `value: ${value.value}, key: ${value.key}`;

        expect(node.toString(toStringCallback)).toBe('value: 1, key: test');
    });

});