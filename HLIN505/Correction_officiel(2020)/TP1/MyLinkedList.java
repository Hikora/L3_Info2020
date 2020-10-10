import java.util.Iterator;
import java.util.NoSuchElementException;
import java.util.function.Consumer;

/**
 * A linked list implementation
 * @param <T> The data stored type.
 */
public class MyLinkedList<T> implements Iterable<T> {
    /**
     * A linked list node
     * @param <T> The data stored type
     */
    private static class Node<T> {
        /**
         * The next element in the list.
         */
        private Node<T> successor;
        /**
         * The value of the node.
         */
        private T value;

        /**
         * Creates the node.
         * @param value Node value
         */
        public Node(T value) {
            this.successor = null;
            this.value = value;
        }

        /**
         * Add an element after the last element of the list.
         * @param value Value of the element.
         */
        public void addToEnd(T value) {
            if (successor != null) {
                this.successor.addToEnd(value);
            }
            if (successor == null) {
                this.successor = new Node<T>(value);
            }
        }

        /**
         * Remove the last element of the list and returns it. We need to check if this element is present and has a successor.
         * @return The removed element.
         */
        public T removeEnd() {
            // Normally, we have a successor, since the method is only called after verification.
            if (successor.getSuccessor() == null) {
                this.successor = null;
                return successor.getValue();
            }
            return this.successor.removeEnd();
        }

        /**
         * Set the successor node.
         * @param node The successor node
         */
        public void setSuccessor(Node<T> node) {
            this.successor = node;
        }

        /**
         * Fetches the successor node.
         * @return Returns the successor node.
         */
        public Node<T> getSuccessor() {
            return this.successor;
        }

        /**
         * Returns the node value.
         * @return The value
         */
        public T getValue() {
            return this.value;
        }

        /**
         * Counts the elements in the list after this one.
         * @return The elements count.
         */
        public int count() {
            if (successor == null) {
                return 1;
            }
            return successor.count() + 1;
        }

        @Override
        public String toString() {
            return value.toString();
        }

        /**
         * Generates recursively a toString for all the list.
         * @return
         */
        public String fullToString() {
            if (successor == null) {
                return this.toString();
            }
            return this.toString() + "," + this.successor.fullToString();
        }

        /**
         * Get an element by its index.
         * @param index The element we want to get.
         * @param currentIndex The current element index.
         * @return The element value.
         */
        public T getIndex(int index, int currentIndex) {
            if (index == currentIndex) {
                return this.getValue();
            } else if (successor == null) {
                throw new IndexOutOfBoundsException();
            } else {
                return this.successor.getIndex(index, currentIndex + 1);
            }
        }

        /**
         * Set an element value by its index.
         * @param index The element index.
         * @param value The element value.
         * @param currentIndex The current element index.
         */
        public void setIndex(int index, T value, int currentIndex) {
            if (index == currentIndex) {
                this.value = value;
            } else if (successor == null) {
                throw new IndexOutOfBoundsException();
            } else {
                this.successor.setIndex(index, value, currentIndex + 1);
            }
        }

        /**
         * Does an action for each remaining element in the list (required for the iterator).
         * @param action The action to execute.
         */
        public void forEachRemaining(Consumer<? super T> action) {
            if (successor != null) {
                successor.forEachRemaining(action);
            }
            action.accept(this.getValue());
        }
    }

    /**
     * A linked list iterator.
     * @param <T> The data stored type
     */
    private static class MyLinkedListIterator<T> implements Iterator<T> {
        /**
         * The current node.
         */
        private Node<T> currentNode;
        /**
         * The next node.
         */
        private Node<T> nextNode;

        /**
         * Creates an iterator on the first node of the list.
         * @param firstNode The root of the list.
         */
        public MyLinkedListIterator(Node<T> firstNode) {
            this.currentNode = null;
            this.nextNode = firstNode;
        }

        /**
         * If there is upcoming elements.
         * @return If there is upcoming elements.
         */
        @Override
        public boolean hasNext() {
            return nextNode != null;
        }

        /**
         * The next element, if it exists (throws an exception if not, so don't forget to check with hasNext() if you want to use it by hand).
         * @return The next element value.
         */
        @Override
        public T next() {
            if (nextNode == null) {
                throw new NoSuchElementException();
            }
            currentNode = nextNode;
            nextNode = nextNode.getSuccessor();
            return currentNode.getValue();
        }

        /**
         * Runs an action on every node of the list.
         * @param action The action.
         */
        @Override
        public void forEachRemaining(Consumer<? super T> action) {
//            if (currentNode != null) {
//                currentNode.forEachRemaining(action);
//            } else if (nextNode != null) {
//                nextNode.forEachRemaining(action);
//            }
            while(hasNext()) {
                action.accept(next());
            }
        }
    }

    /**
     * The root node.
     */
    private Node<T> root;

    /**
     * Constructor of the linked list. Init the root to null because the list is empty by default.
     */
    public MyLinkedList() {
        this.root = null;
    }

    /**
     * Fetches an iterator.
     * @return The iterator allowing to browse the list content.
     */
    @Override
    public Iterator<T> iterator() {
        return new MyLinkedListIterator<T>(this.root);
    }

    /**
     * Run an action on every element in the list.
     * @param action Action to run for each instance in the list.
     */
    @Override
    public void forEach(Consumer<? super T> action) {
        if (root != null) {
            root.forEachRemaining(action);
        }
    }

    /**
     * Adds an element at the end of the list.
     * @param element The element to add at the end of the list.
     */
    public void push (T element) {
        int oldLength = this.length();
        if (root == null) {
            root = new Node<T>(element);
        } else {
            root.addToEnd(element);
        }

        int newLength = this.length();
        assert newLength == oldLength + 1 : "The new length is not incremented by 1 from the previous one.";
    }

    /**
     * Removes the last element of the list.
     * @return The removed element
     */
    public T popBack() {
        if (root == null) {
            return null;
        } else if (root.getSuccessor() == null) {
            root = null;
            return root.getValue();
        } else {
            return root.removeEnd();
        }
    }

    /**
     * Removes the element at the start of the list.
     * @return The removed element.
     */
    public T popFront() {
        if (root == null) {
            return null;
        } else {
            Node<T> oldRoot = this.root;
            this.root = oldRoot.getSuccessor();
            return oldRoot.getValue();
        }
    }

    /**
     * Adds an element at the start of the list.
     * @param element The element to add
     */
    public void addFirst(T element) {
        int oldLength = this.length();
        Node<T> oldRoot = root;
        root = new Node<T>(element);
        root.setSuccessor(oldRoot);

        int newLength = this.length();
        assert newLength == oldLength + 1 : "The new length is not incremented by 1 from the previous one.";
    }

    /**
     * Computes the length of the list.
     * @return The length of the list.
     */
    public int length() {
        if (root == null) {
            return 0;
        }
        return root.count();
    }

    /**
     * Get an element by its index.
     * @param index The index we want.
     * @return The element at this index.
     */
    public T get(int index) {
        if (root == null) {
            throw new ArrayIndexOutOfBoundsException();
        }
        return root.getIndex(index, 0);
    }

    /**
     * Define a node value by its index (Warning : the index must exist before the list creation).
     * @param index The index we want to set
     * @param value The value we want to put inside.
     */
    public void set(int index, T value) {
        if (root == null) {
            throw new ArrayIndexOutOfBoundsException();
        }
        root.setIndex(index, value, 0);
    }

    @Override
    public String toString() {
        if (root == null) {
            return "Void linked list.";
        } else {
            return root.fullToString();
        }
    }

    /**
     * Display the linked list.
     */
    public void display() {
        System.out.println(this);
    }

    /**
     * Generates a copy of the list, but the nodes are reversed (Warning : values aren't cloned, so if you stores object, it might have strange behaviours).
     * @return The new reversed list.
     */
    public MyLinkedList<T> reverse() {
        int length = this.length();
        MyLinkedList<T> retour = new MyLinkedList<>();

        for(int i = length - 1; i >= 0; --i) {
            retour.push(this.get(i));
        }

        return retour;
    }
}
